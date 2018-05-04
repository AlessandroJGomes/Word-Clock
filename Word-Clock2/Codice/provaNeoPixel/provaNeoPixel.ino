#include <Adafruit_GFX.h> 
#include <Adafruit_NeoMatrix.h>
#include <Adafruit_NeoPixel.h>




#define PIN 6
// Parameter 1 = number of pixels in strip
// Parameter 2 = pin number (most are valid)
// Parameter 3 = pixel type flags, add together as needed:
//   NEO_KHZ800  800 KHz bitstream (most NeoPixel products w/WS2812 LEDs)
//   NEO_KHZ400  400 KHz (classic 'v1' (not v2) FLORA pixels, WS2811 drivers)
//   NEO_GRB     Pixels are wired for GRB bitstream (most NeoPixel products)
//   NEO_RGB     Pixels are wired for RGB bitstream (v1 FLORA pixels, not v2)
Adafruit_NeoPixel strip = Adafruit_NeoPixel(71, PIN, NEO_GRB + NEO_KHZ800);
void setup() {
  strip.begin();
  strip.setBrightness(40);
  strip.show(); // Initialize all pixels to 'off'
}
void loop() {
  int temp1 = 0;
  int temp2 = 0;
  int temp3 = 0;
  while(true){
    temp1++;
    strip.setPixelColor(temp1, 255, 255, 255);
    temp2 = temp1 + 1;;
    strip.setPixelColor(temp2, 255, 255, 255);
    temp3 = temp2 + 1;;
    strip.setPixelColor(temp3, 255, 255, 255);

    strip.setPixelColor(temp1, 0, 0, 0);
    strip.setPixelColor(temp2, 0, 0, 0);
    strip.setPixelColor(temp3, 0, 0, 0);
    strip.show();
    
  }
  
  delay(10);
}

