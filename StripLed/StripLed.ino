#include <Adafruit_GFX.h>
#include <Adafruit_NeoMatrix.h>
#include <Adafruit_NeoPixel.h>

#define PIN 6
int i = 0;
bool dir = true;
Adafruit_NeoPixel strip = Adafruit_NeoPixel(144, PIN, NEO_GRB + NEO_KHZ800);

void setup() {
  strip.begin();
  strip.setBrightness(40);
  strip.show();
}

void loop() {
  /*
    if(i == 143){
      dir = false;
    }
    else if(i == 0){
      dir = true;
    }

    if(dir){
      i++;
    }
    else{
      i--;
    }
    //strip.setPixelColor(i, 255, 0, 255);
    if(i%2 == 0){
      strip.setPixelColor(i, 255, 0, 0);
    }
    else if(i%3 == 0){
      strip.setPixelColor(i, 0, 255, 0);
    }
    else{
      strip.setPixelColor(i, 0, 0, 255);
    }
    strip.show();
    strip.setPixelColor(i, 0, 0, 0);
  */
  dir = !dir;
  for (int j = 0; j < 144; j++) {
    if (dir) {
      strip.setPixelColor(j, 60, 0, 0);
    }
    else {
      strip.setPixelColor(j, 55, 255, 255);
    }
  }
  strip.show();

  delay(10);
}
