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
Adafruit_NeoPixel strip = Adafruit_NeoPixel(195, PIN, NEO_GRB + NEO_KHZ800);
int sonoLeTre[9] = {28, 51, 54, 77, 103, 106, 23, 30, 49};

void setup() {
    strip.begin();
    strip.setBrightness(500);
    strip.show();
}

void loop() {

    
    strip.setPixelColor(i-6, 0, 0, 0);
    strip.setPixelColor(i-5, 0, 0, 0);
    strip.setPixelColor(i-4, 0, 0, 0);
    strip.setPixelColor(i-3, 0, 0, 0);
    strip.setPixelColor(i-2, 0, 0, 0);
    strip.setPixelColor(i-1, 0, 0, 0);
    strip.setPixelColor(i, 0, 0, 0);
    strip.setPixelColor(i+1, 0, 0, 0);
    strip.setPixelColor(i+2, 0, 0, 0);
    strip.setPixelColor(i+3, 0, 0, 0);
    strip.setPixelColor(i+4, 0, 0, 0);
    strip.setPixelColor(i+5, 0, 0, 0);
    strip.setPixelColor(i+6, 0, 0, 0);
    
    if(i == 195){
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
    /**
    int riga = i % 13;
    int colonna = ceil(i / 13);
    if(i % 2 != 0){
      riga = 13 - riga;
    }*/
    
    
    
    
    strip.setPixelColor(i-6, 255, 0, 0);
    strip.setPixelColor(i-5, 0, 255, 0);
    strip.setPixelColor(i-4, 0, 0, 0);
    strip.setPixelColor(i-3, 255, 0, 0);
    strip.setPixelColor(i-2, 0, 255, 0);
    strip.setPixelColor(i-1, 0, 0, 0);
    strip.setPixelColor(i, 0, 0, 0);
    strip.setPixelColor(i+1, 255, 0, 0);
    strip.setPixelColor(i+2, 0, 255, 0);
    strip.setPixelColor(i+3, 0, 0, 0);
    strip.setPixelColor(i+4, 255, 0, 0);
    strip.setPixelColor(i+5, 0, 255, 0);
    strip.setPixelColor(i+6, 0, 0, 0);
    
    
    /*
     * for(int j = 0; j < 195; j++){
     *  strip.setPixelColor(i, 255, 0, 255);
     * } 
     */
    strip.show();
    
    delay(10);
}
