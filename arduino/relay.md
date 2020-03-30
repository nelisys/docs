# Relay

## 5V 1 Channel Relay Low Level Trigger Relay Module (with LED)

- SRD-05VDC-SL-C

### Wiring

```
 /-------\     /---------\
 | Relay |     | Arduino |
 +-------+     +---------+
 | VCC   |-----| 5V      |
 | GND   |-----| GND     |
 | IN    |-----| 12      |
 \-------/     \---------/
```

### Code

```c
#define RELAY 12

void setup() {
  Serial.begin(9600);
  pinMode(RELAY, OUTPUT);
}

void loop() {
  // NO -> close (Green LED on)
  digitalWrite(RELAY, LOW);
  delay(1000)

  // NO -> open (Green LED off)
  digitalWrite(RELAY, HIGH);
  delay(1000)  
}
```
