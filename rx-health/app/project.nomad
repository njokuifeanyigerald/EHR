job "rx-emr-v2-admin-${CI_ENVIRONMENT_NAME}-mobihealth" {
  datacenters = ["${DATACENTER}"]
  type        = "service"

  update {
    max_parallel     = 1
    stagger          = "30s"
  }

  group "rx-emr-v2-admin" {
      count = 1
     network {
        port "http" {
          to = 80
        }
        port "fpm" {
          to = 9000
        }
        port "redis" {
          to = 6379
        }
      }

      service {
        name = "rx-emr-v2-admin-${CI_ENVIRONMENT_NAME}-mobihealth"
        port = "http"
        tags = [
          "traefik.enable=true",
          "traefik.http.routers.rx-emr-v2-admin-${CI_ENVIRONMENT_NAME}-mobihealth.rule=${TRAEFIK_RULE}",
          "traefik.http.routers.rx-emr-v2-admin-${CI_ENVIRONMENT_NAME}-mobihealth.tls=true",
          "traefik.http.routers.rx-emr-v2-admin-${CI_ENVIRONMENT_NAME}-mobihealth.tls.certresolver=le",
        ]
      }

      service {
        name = "emr-admin-redis-${CI_ENVIRONMENT_NAME}"
        port = "redis"
        tags = ["global"]
        check {
          type     = "tcp"
          interval = "10s"
          timeout  = "2s"
        }
      }

      task "redis" {
        driver = "docker"

        config {
          image = "redis:latest"
          ports = ["redis"]
        }

        resources {
          cpu    = 200
          memory = 250
        }
     }

      task "app-emr-v3-admin" {
        driver = "docker"
        config {
          image = "registry.jamsinfra.com/infrastructure/php-docker:8.2.9-fpm"
          ports = ["fpm"]

          auth {
            username       = "${CI_DEPLOY_USER}"
            password       = "${CI_DEPLOY_ACCESS_TOKEN}"
            server_address = "gitlab.rxcrshis.org:8443"
          }

          mounts = [
            {
              type     = "bind"
              source   = "local/app"
              target   = "/app"
              readonly = "false"
            },
            {
              type     = "bind"
              source   = "local/connections/env"
              target   = "/app/.env"
              readonly = "true"
            },
            {
              type     = "bind"
              source   = "local/connections/fpm-www.conf"
              target   = "/usr/local/etc/php-fpm.d/www.conf"
              readonly = "true"
            }
          ]
        }

        artifact {
          source      = "git::https://${CI_DEPLOY_AUTH}:${CI_DEPLOY_ACCESS_TOKEN}@gitlab.jamsinfra.com/${CI_PROJECT_NAMESPACE}/${CI_PROJECT_NAME}.git"
          destination = "local/app"
          mode        = "dir"
          options {
            ref = "${CI_COMMIT_SHORT_SHA}"
          }
        }

        template {
          destination = "local/connections/fpm-www.conf"
          data        = "{{ key \"emr/v2-admin/mobihealth/${CI_ENVIRONMENT_NAME}/fpm-pool\" }}"
        }

        template {
          destination = "local/connections/env"
          data        = "{{ key \"emr/v2-admin/mobihealth/${CI_ENVIRONMENT_NAME}/env\" }}"
        }

       template {
        data = <<EOF
          REDIS_HOST="{{- range service "emr-admin-redis-${CI_ENVIRONMENT_NAME}" }}{{ .Address }}{{- end }}"
          REDIS_PORT="{{- range service "emr-admin-redis-${CI_ENVIRONMENT_NAME}" }}{{ .Port }}{{- end }}"
        EOF

        destination = "secrets/file.env"
        env         = true
       }

        resources {
          cpu    = 200
          memory = 300
        }
      }

      task "app-service-queue" {
      driver = "docker"
      config {
        image = "registry.jamsinfra.com/infrastructure/php-docker:8.2.9-fpm"
        auth {
          username       = "${CI_DEPLOY_USER}"
          password       = "${CI_DEPLOY_ACCESS_TOKEN}"
          server_address = "gitlab.rxcrshis.org:8443"
        }

        mounts = [
            {
              type     = "bind"
              source   = "local/app"
              target   = "/app"
              readonly = "false"
            },
            {
              type     = "bind"
              source   = "local/connections/env"
              target   = "/app/.env"
              readonly = "true"
            },
            {
              type     = "bind"
              source   = "local/connections/fpm-www.conf"
              target   = "/usr/local/etc/php-fpm.d/www.conf"
              readonly = "true"
            }
          ]
          entrypoint = ["/bin/bash", "-c"]
          command = "composer install --working-dir=/app && php artisan schedule:work"
        }

        artifact {
          source      = "git::https://${CI_DEPLOY_AUTH}:${CI_DEPLOY_ACCESS_TOKEN}@gitlab.jamsinfra.com/${CI_PROJECT_NAMESPACE}/${CI_PROJECT_NAME}.git"
          destination = "local/app"
          mode        = "dir"
          options {
            ref = "${CI_COMMIT_SHORT_SHA}"
          }
        }

        template {
          destination = "local/connections/fpm-www.conf"
          data        = "{{ key \"emr/v2-admin/mobihealth/${CI_ENVIRONMENT_NAME}/fpm-pool\" }}"
        }

        template {
          destination = "local/connections/env"
          data        = "{{ key \"emr/v2-admin/mobihealth/${CI_ENVIRONMENT_NAME}/env\" }}"
        }

       template {
        data = <<EOF
          REDIS_HOST="{{- range service "emr-admin-redis-${CI_ENVIRONMENT_NAME}" }}{{ .Address }}{{- end }}"
          REDIS_PORT="{{- range service "emr-admin-redis-${CI_ENVIRONMENT_NAME}" }}{{ .Port }}{{- end }}"
        EOF

        destination = "secrets/file.env"
        env         = true
       }

      resources {
        cpu    = 200
        memory = 200
      }

       lifecycle {
        hook   = "poststart"
        sidecar = false
      }
    }

      task "nginx" {
        driver = "docker"
        config {
          image = "gitlab.rxcrshis.org:8443/infrastructure/nginx"
          ports = ["http"]
          auth {
            username       = "${CI_DEPLOY_USER}"
            password       = "${CI_DEPLOY_ACCESS_TOKEN}"
            server_address = "gitlab.rxcrshis.org:8443"
          }

          mounts = [
            {
              type     = "bind"
              source   = "local"
              target   = "/etc/nginx/conf.d/"
              readonly = "true"
            },
            {
              type     = "bind"
              source   = "local/app"
              target   = "/app"
              readonly = "true"
            }
          ]
        }

        artifact {
          source      = "git::https://${CI_DEPLOY_AUTH}:${CI_DEPLOY_ACCESS_TOKEN}@gitlab.jamsinfra.com/${CI_PROJECT_NAMESPACE}/${CI_PROJECT_NAME}.git"
          destination = "local/app"
          mode        = "dir"
          options {
            ref = "${CI_COMMIT_SHORT_SHA}"
          }
        }

        template {
          destination = "local/default.conf"
          data        = <<EOD
      server {
          listen 80 default_server;
          listen [::]:80 default_server ipv6only=on;
          client_max_body_size 100M;

          root /app/public;
          index index.php;

          location / {
              try_files $uri $uri/ /index.php?$query_string;
          }

          location /files/ {
              alias /alloc/data/files/;
          }

          location ~ \.php$ {
              try_files $uri /index.php =404;
              fastcgi_split_path_info ^(.+\.php)(/.+)$;
              fastcgi_pass {{env "NOMAD_ADDR_fpm"}};
              fastcgi_index index.php;
              fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
              fastcgi_buffers 16 32k;
              fastcgi_buffer_size 64k;
              fastcgi_busy_buffers_size 64k;
              include fastcgi_params;
              client_max_body_size 100M;
          }
      }
  EOD
        }

        resources {
          cpu    = 200
          memory = 250
        }
      }
    }
}