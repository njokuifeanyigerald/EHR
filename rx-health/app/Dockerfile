FROM ubuntu:latest AS builder

ARG PHP_VERSION=8.2
ENV DEBIAN_FRONTEND=noninteractive
ENV VITE_API_URL=http://localhost

# --- SYSTEM SETUP ---
RUN apt update && \
    apt install -y software-properties-common curl unzip gnupg2 ca-certificates nodejs npm

# --- PHP + EXTENSIONS ---
RUN add-apt-repository ppa:ondrej/php && apt update && \
    apt install -y \
    php$PHP_VERSION-cli \
    php$PHP_VERSION-common \
    php$PHP_VERSION-fpm \
    php$PHP_VERSION-mysql \
    php$PHP_VERSION-zip \
    php$PHP_VERSION-gd \
    php$PHP_VERSION-mbstring \
    php$PHP_VERSION-curl \
    php$PHP_VERSION-xml \
    php$PHP_VERSION-bcmath \
    php$PHP_VERSION-pdo \
    php$PHP_VERSION-intl

# --- COMPOSER ---
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# --- APP SETUP ---
COPY . /var/www/html
WORKDIR /var/www/html

# You can uncomment these if you want to build assets during the build phase
# RUN composer install --ignore-platform-req=ext-intl
# RUN npm install
# RUN npm run build


# --- FINAL STAGE ---
FROM ubuntu:latest AS final

ARG PHP_VERSION=8.2
ENV DEBIAN_FRONTEND=noninteractive

# --- SYSTEM + PHP + NODE ---
RUN apt update && \
    apt install -y software-properties-common curl gnupg2 ca-certificates nginx unzip nodejs npm && \
    add-apt-repository ppa:ondrej/php && apt update && \
    apt install -y \
    php$PHP_VERSION-cli \
    php$PHP_VERSION-fpm \
    php$PHP_VERSION-common \
    php$PHP_VERSION-mysql \
    php$PHP_VERSION-zip \
    php$PHP_VERSION-gd \
    php$PHP_VERSION-mbstring \
    php$PHP_VERSION-curl \
    php$PHP_VERSION-xml \
    php$PHP_VERSION-bcmath \
    php$PHP_VERSION-pdo \
    php$PHP_VERSION-intl

# --- IONCUBE INSTALLATION ---
RUN curl -fsSL https://downloads.ioncube.com/loader_downloads/ioncube_loaders_lin_x86-64.tar.gz -o ioncube.tar.gz && \
    tar -xzf ioncube.tar.gz && \
    EXT_DIR=$(php -i | grep ^extension_dir | awk '{print $3}') && \
    cp ioncube/ioncube_loader_lin_${PHP_VERSION}.so "$EXT_DIR" && \
    echo "zend_extension=$EXT_DIR/ioncube_loader_lin_${PHP_VERSION}.so" > /etc/php/${PHP_VERSION}/cli/conf.d/00-ioncube.ini && \
    echo "zend_extension=$EXT_DIR/ioncube_loader_lin_${PHP_VERSION}.so" > /etc/php/${PHP_VERSION}/fpm/conf.d/00-ioncube.ini && \
    rm -rf ioncube.tar.gz ioncube

# --- COPY APP FROM BUILDER ---
COPY --from=builder /var/www/html /var/www/html
WORKDIR /var/www/html

# --- SET PERMISSIONS ---
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 555 /var/www/html && \
    chmod -R 777 /var/www/html/storage

# --- COMPOSER ---
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# --- NGINX CONFIG ---
RUN echo "\
server {\n\
    listen 80;\n\
    root /var/www/html/public;\n\
    index index.php index.html;\n\
    location / {\n\
        try_files \$uri \$uri/ /index.php?\$query_string;\n\
    }\n\
    location ~ \.php\$ {\n\
        include snippets/fastcgi-php.conf;\n\
        fastcgi_pass unix:/run/php/php${PHP_VERSION}-fpm.sock;\n\
    }\n\
    location ~ /\.ht {\n\
        deny all;\n\
    }\n\
}" > /etc/nginx/sites-available/default

# --- START SCRIPT ---
RUN printf '#!/bin/bash\n\
service php%s-fpm start\n\
cd /var/www/html\n\
if [ ! -d "vendor" ]; then\n\
  composer install --ignore-platform-req=ext-intl \n\
fi\n\
php artisan config:cache\n\
php artisan schedule:run\n\
nginx -g "daemon off;"\n' "$PHP_VERSION" > /start.sh && \
    chmod +x /start.sh

EXPOSE 80
CMD ["/start.sh"]
