resource "aws_instance" "this" {
  ami   = var.ami
  instance_type = var.instance_type
  key_name =  var.key_name

    network_interface {
      network_interface_id =  var.network_interface_id
      device_index = 0
    }

    user_data  =  base64encode(<<-EOF
    ~
    )

}

