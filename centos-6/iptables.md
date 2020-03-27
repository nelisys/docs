# iptables

```
iptables -A FORWARD -s $src_ip -d $dst_ip -j ACCEPT

iptables -t nat -A POSTROUTING -s $src_ip -d $dst_ip -j SNAT --to-source $wan_ip
```
