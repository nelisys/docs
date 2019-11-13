# lm-sensors

```console
$ sudo apt install -y lm-sensors
```

```console
$ sudo sensors-detect
# sensors-detect revision 6284 (2015-05-31 14:00:33 +0200)
# System: Dell Inc. PowerEdge R...
# Board: Dell Inc. 0.....
# Kernel: 4.15.0-66-generic x86_64
# Processor: Intel(R) Xeon(R) .... CPU @ 2...GHz

This program will help you determine which kernel modules you need
to load to use lm_sensors most effectively. It is generally safe
and recommended to accept the default answers to all questions,
unless you know what you're doing.
...
```

```console
$ sensors
coretemp-isa-0000
Adapter: ISA adapter
Package id 0:  +29.0°C  (high = +86.0°C, crit = +96.0°C)
Core 1:        +28.0°C  (high = +86.0°C, crit = +96.0°C)
Core 2:        +26.0°C  (high = +86.0°C, crit = +96.0°C)
```
