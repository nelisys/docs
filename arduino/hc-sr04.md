# HC-SR04

## Wiring

```
 /-------\     /---------\
 | Relay |     | Arduino |
 +-------+     +---------+
 | Vcc   |-----| 5V      |
 | Trig  |-----| 12      |
 | Echo  |-----| 13      |
 | Gnd   |-----| GND     |
 \-------/     \---------/
```

## Code

```c
#define Trig_PIN 12
#define Echo_PIN 13

void setup() {
  pinMode(Trig_PIN, OUTPUT);
  pinMode(Echo_PIN, INPUT);
  Serial.begin(9600);
}

void loop() {
  digitalWrite(Trig_PIN, LOW);
  delayMicroseconds(5);
  digitalWrite(Trig_PIN, HIGH);
  delayMicroseconds(10);
  digitalWrite(Trig_PIN, LOW);
  
  unsigned int PulseWidth = pulseIn(Echo_PIN, HIGH);
  unsigned int distance = PulseWidth * 0.0173681;
  
  Serial.print(distance);
  Serial.println(" cm.");
  delay(1000);
}
```
