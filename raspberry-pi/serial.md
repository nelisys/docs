# serial

```
sudo apt install python3-serial
```

## python

```py
import serial
import time

uart_port = '/dev/serial0'
baud_rate = 9600

ser = serial.Serial(uart_port, baud_rate, timeout=1)

if ser.is_open:
    print("UART port is open")

try:
    hex_data = bytes.fromhex("41 42 43 44")

    ser.write(hex_data)

    print(f"Sent: {hex_data}")

    time.sleep(1)

    if ser.in_waiting > 0:
        response = ser.read(ser.in_waiting)
        print(f"Received: {response}")

except Exception as e:
    print(f"Error: {e}")

finally:
    ser.close()
```
