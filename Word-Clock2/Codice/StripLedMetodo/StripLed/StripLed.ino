#include <Adafruit_GFX.h> 
#include <Adafruit_NeoMatrix.h>
#include <Adafruit_NeoPixel.h>

#define PIN 6
int i = 0;
bool dir = true;
//   NEO_RGB     Pixels are wired for RGB bitstream
//   NEO_GRB     Pixels are wired for GRB bitstream, correct for neopixel stick
//   NEO_KHZ400  400 KHz bitstream (e.g. FLORA pixels)
//   NEO_KHZ800  800 KHz bitstream (e.g. High Density LED strip), correct for neopixel stick
Adafruit_NeoPixel strip = Adafruit_NeoPixel(144, PIN, NEO_GRB + NEO_KHZ800);

void setup() {
    strip.begin();
    strip.setBrightness(50);
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

    for(int j = 0; j < 144; j++){

        strip.setPixelColor(j, 255, 0, 0);
    }
    strip.show();
    
    delay(10);
}
