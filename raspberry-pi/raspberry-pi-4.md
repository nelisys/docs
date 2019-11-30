# Raspberry Pi 4

## Model

```console
$ cat /proc/device-tree/model
Raspberry Pi 4 Model B Rev 1.1
```

## CPU

```console
$ cat /proc/cpuinfo
processor    : 0
model name    : ARMv7 Processor rev 3 (v7l)
BogoMIPS    : 108.00
Features    : half thumb fastmult vfp edsp neon vfpv3 tls vfpv4 idiva idivt vfpd32 lpae evtstrm crc32
CPU implementer    : 0x41
CPU architecture: 7
CPU variant    : 0x0
CPU part    : 0xd08
CPU revision    : 3

processor    : 1
model name    : ARMv7 Processor rev 3 (v7l)
BogoMIPS    : 108.00
Features    : half thumb fastmult vfp edsp neon vfpv3 tls vfpv4 idiva idivt vfpd32 lpae evtstrm crc32
CPU implementer    : 0x41
CPU architecture: 7
CPU variant    : 0x0
CPU part    : 0xd08
CPU revision    : 3

processor    : 2
model name    : ARMv7 Processor rev 3 (v7l)
BogoMIPS    : 108.00
Features    : half thumb fastmult vfp edsp neon vfpv3 tls vfpv4 idiva idivt vfpd32 lpae evtstrm crc32
CPU implementer    : 0x41
CPU architecture: 7
CPU variant    : 0x0
CPU part    : 0xd08
CPU revision    : 3

processor    : 3
model name    : ARMv7 Processor rev 3 (v7l)
BogoMIPS    : 108.00
Features    : half thumb fastmult vfp edsp neon vfpv3 tls vfpv4 idiva idivt vfpd32 lpae evtstrm crc32
CPU implementer    : 0x41
CPU architecture: 7
CPU variant    : 0x0
CPU part    : 0xd08
CPU revision    : 3

Hardware    : BCM2835
Revision    : a03111
Serial        : 1000000072cec629
Model        : Raspberry Pi 4 Model B Rev 1.1
```

## Memory : Model 1GB RAM

```console
$ free
              total        used        free      shared  buff/cache   available
Mem:         946664       52908      816012        6332       77744      832156
Swap:        102396           0      102396
```
