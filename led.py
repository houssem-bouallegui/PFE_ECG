#!/usr/bin/env python3

import time
import digitalio
import board
import busio

led = digitalio.DigitalInOut(board.D16)
led.direction = digitalio.Direction.OUTPUT
print(led.value)
led.value = True
print(led.value)
time.sleep(1)
led.value = False
