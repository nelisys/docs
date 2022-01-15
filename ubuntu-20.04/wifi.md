# WiFi

# Network Configuartion

$ vi /etc/netplan/00-installer-config-wifi.yaml
network:
  version: 2
  wifis:
    wlo1:
      access-points:
        SSID_NAME:
          password: SSID_PASSWORD
      dhcp4: true

