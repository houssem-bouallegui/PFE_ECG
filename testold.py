#!/usr/bin/env python3
import numpy as np
import matplotlib as mpl
import matplotlib.pyplot as plt
import matplotlib.animation as animation
#import serial
#import platform
#import requests
import time
import digitalio
import board
import busio
import adafruit_ads1x15.ads1115 as ADS
from adafruit_ads1x15.analog_in import AnalogIn



fig, ax = plt.subplots()
line, = ax.plot(np.random.rand(10))
ax.set_ylim(0,35000)
xdata, ydata = [0]*100, [0]*100


def update(data):
    line.set_ydata(data)
    return line,

def run(data):
    global xdata, ydata
    x,y = data
    if (x == 0):
        xdata = [0]*100
        ydata = [0]*100
    del xdata[0]
    del ydata[0]
    xdata.append(x)
    ydata.append(y)
    line.set_data(xdata, ydata)
    return line,

def data_gen():
    x = 9
    lo1=digitalio.DigitalInOut(board.D21)
    lo2=digitalio.DigitalInOut(board.D20)
    i2c = busio.I2C(board.SCL, board.SDA)
    ads = ADS.ADS1115(i2c)
    chan = AnalogIn(ads, ADS.P0)
    ads.gain = 2
    start = time.time()
    while (time.time() - start) <= 30.0:
        if (x >= 9):
            x = 0
        else:
            x += 0.1
        if ((lo1 == 1)or(lo2 == 1)):
          print("")  
        else:
            inRaw = chan.value
            inInt = int(inRaw)
        yield x, inInt

ani = animation.FuncAnimation(fig, run, data_gen, interval=0, blit=True)
plt.show()
