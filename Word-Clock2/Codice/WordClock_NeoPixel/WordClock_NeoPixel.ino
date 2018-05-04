#include <Adafruit_GFX.h> 
#include <Adafruit_NeoMatrix.h>
#include <Adafruit_NeoPixel.h>

#define PIN 6

int colonnaSecondi[13];
int rigaMinuti[] = {27, 53,79,105, 131,157,183};

Adafruit_NeoPixel strip = Adafruit_NeoPixel(195, PIN, NEO_GRB + NEO_KHZ800);

void setup() {
    strip.begin();
    strip.setBrightness(50);
    strip.show();

}

void loop() {
  

}
