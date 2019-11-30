# Raspberry Pi 2

## Model

```console
$ cat /proc/device-tree/model
Raspberry Pi Model B Plus Rev 1.2
```

## CPU

```console
$ cat /proc/cpuinfo
processor    : 0
model name    : ARMv6-compatible processor rev 7 (v6l)
BogoMIPS    : 697.95
Features    : half thumb fastmult vfp edsp java tls
CPU implementer    : 0x41
CPU architecture: 7
CPU variant    : 0x0
CPU part    : 0xb76
CPU revision    : 7

Hardware    : BCM2835
Revision    : 0010
Serial        : 0000000078d0....
Model        : Raspberry Pi Model B Plus Rev 1.2
```

## Memory

```console
$ free
              total        used        free      shared  buff/cache   available
Mem:         443080       32416      198492        5896      212172      352696
Swap:        102396           0      102396
```
