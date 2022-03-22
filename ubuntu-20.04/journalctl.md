# journalctl

## View

$ journalctl

```
-- Logs begin at Sat 2022-02-12 16:18:21 +07, end at Tue 2022-03-22 13:58:49 +07. --
Feb 12 16:18:21 ubuntu kernel: Linux version 5....
Feb 12 16:18:21 ubuntu kernel: Command line: BOOT_IMAGE=/boot/vmlinuz-5...
Feb 12 16:18:21 ubuntu kernel: KERNEL supported cpus:
```

```
$ journalctl --list-boots
-2 e32e... Wed 2022-03-09 16:44:01 +07—Sat 2022-03-12 14:32:07 +07
-1 f9e3... Sat 2022-03-12 14:40:41 +07—Fri 2022-03-18 19:13:01 +07
 0 e141... Fri 2022-03-18 19:14:24 +07—Tue 2022-03-22 13:58:49 +07
```

## Manage

```
$ journalctl --disk-usage
Archived and active journals take up 56.0M in the file system.
```

```
$ sudo journalctl --vacuum-time=180days
```

