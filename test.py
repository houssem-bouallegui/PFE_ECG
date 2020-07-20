#!/usr/bin/env python3
import sys
import numpy as np
import datetime
import time
import digitalio
import board
import busio
import adafruit_ads1x15.ads1115 as ADS
from adafruit_ads1x15.analog_in import AnalogIn

def main():
    print("Initialisation ...")
    duration = int(sys.argv[1])
    lo1 = digitalio.DigitalInOut(board.D21)
    lo2 = digitalio.DigitalInOut(board.D20)
    led = digitalio.DigitalInOut(board.D16)
    led.direction = digitalio.Direction.OUTPUT
    print(led.value)
    led.value = True
    print(led.value)
    i2c = busio.I2C(board.SCL, board.SDA)
    ads = ADS.ADS1115(i2c)
    chan = AnalogIn(ads, ADS.P0)
    ads.gain = 2
    with open('ECG_Raw_data.dat', 'w') as f:
     f.truncate(0)
     start_time = datetime.datetime.now()
     check = True
     #duration = 10
     print("Starting Raw Data Acquisition")
     while check == True:
         if ((datetime.datetime.now() - start_time) < datetime.timedelta(seconds=duration)):
          check = True
          if ((lo1 == 1)or(lo2 == 1)):
            print("")  
          else:
              inRaw = chan.value
              inInt = int(inRaw)
              f.write("%s \n" % str(inInt))
         else:
            check = False
     print("Finished Raw Data Acquisition")
     led.value = False
     f.close()

if __name__== "__main__":
  main()
