# Console

## Console font

### Default configuration file

Default `/etc/default/console-setup`

```
# CONFIGURATION FILE FOR SETUPCON

# Consult the console-setup(5) manual page.

ACTIVE_CONSOLES="/dev/tty[1-6]"

CHARMAP="UTF-8"

CODESET="guess"
FONTFACE="Fixed"
FONTSIZE="8x16"

VIDEOMODE=

# The following is an example how to use a braille font
# FONT='lat9w-08.psf.gz brl-8x8.psf'
```

### Valid fonts

```
$ man console-setup
...
    FONTFACE and FONTSIZE
        Valid font faces are: VGA (sizes 8x8, 8x14, 8x16, 16x28 and 16x32),
        Terminus  (sizes 6x12,  8x14,  8x16,  10x20,  12x24, 14x28 and 16x32),
        TerminusBold (sizes 8x14, 8x16, 10x20, 12x24, 14x28 and 16x32),
        TerminusBoldVGA (sizes  8x14  and  8x16),  and
        Fixed (sizes  8x13,  8x14,  8x15,  8x16  and 8x18).
    ...
```

### Try change console font

Edit `/etc/default/console-setup`

```
# CONFIGURATION FILE FOR SETUPCON

# Consult the console-setup(5) manual page.

ACTIVE_CONSOLES="/dev/tty[1-6]"

CHARMAP="UTF-8"

CODESET="guess"
FONTFACE="TerminusBold"
FONTSIZE="32x16"

VIDEOMODE=

# The following is an example how to use a braille font
# FONT='lat9w-08.psf.gz brl-8x8.psf'
```

On console, run `setupcon` to activate the font.

```
$ setupcon
```
