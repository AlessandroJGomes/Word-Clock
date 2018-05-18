#include <Adafruit_GFX.h>
#include <Adafruit_NeoMatrix.h>
#include <Adafruit_NeoPixel.h>

#define PIN 6 //PIN di uscita dei dati.

int ora = 0; //Variabile contenente le ore.
int minuti = 0; //Variabile contenente i minuti.
int secondi = 0; //Variabile contenente i secondi.
boolean m = false; //Variabile booleana che definisce l'attivazione della parola meno.
int minutiDaSottrarre = 0; //Variabile che contiene i minuti da sottrarre per arrivare all'ora piena.
int gestioneMinuti = 0; //Variabile che aiuta a gestire le parole, i pallini e i simboli + e - per i minuti
int stripeLength = 195; //Lunghezza striscia led.

//   NEO_RGB     Pixels are wired for RGB bitstream
//   NEO_GRB     Pixels are wired for GRB bitstream, correct for neopixel stick
//   NEO_KHZ400  400 KHz bitstream (e.g. FLORA pixels)
//   NEO_KHZ800  800 KHz bitstream (e.g. High Density LED strip), correct for neopixel stick
Adafruit_NeoPixel strip = Adafruit_NeoPixel(stripeLength, PIN, NEO_GRB + NEO_KHZ800); //Variabile che, tramite il suo metodo, gestisce il collegamento alla striscia di led neopixel.

//Array per gestire i "casi speciali":
int colonnaSecondi[13]; //Array contenente il numero dei led corrispondenti alla riga verticale dei pallini che segnano i secodni con multipli di 5.
int rigaPalliniMinuti[4] = {79, 105, 131, 157}; //Array contenente il numero dei led corrispondenti alla riga orizzontale dei pallini che segnano i minuti tra 1 e 4.
int piuMeno[2] = {27, 53}; //Array contenente il numero dei led corrispondenti al + ed al - posti nella riga orizzontale in cima.
int e[1] = {190}; //Array contenente il numero del led corrispondente alla lettera: "E".
int meno[4] = {17, 36, 43, 62}; //Array contenente il contenente il numero dei led corrispondente alla parola: "meno";
int unQuarto[8] = {89, 94, 120, 141, 146, 167, 172, 193}; //Array contenente il numero dei led corrispondenti alla scritta: "Un quarto".
int mezza[5] = {142, 145, 168, 171, 194}; //Array contenente il numero dei led corrispondenti alla parola: "mezza".

//Array delle ore:
int eLUna[6] = {25, 132, 155, 158, 181, 184}; //Array contenente il numero dei led corrispondenti alla scritta: "È l'una".
int sonoLeDue[9] = {28, 51, 54, 77, 103, 106, 159, 180, 185}; //Array contenente il numero dei led corrispondenti alla scritta: "Sono le due".
int sonoLeTre[9] = {28, 51, 54, 77, 103, 106, 23, 30, 49}; //Array contenente il numero dei led corrispondenti alla scritta: "Sono le tre".
int sonoLeQuattro[13] = {28, 51, 54, 77, 103, 106, 75, 82, 101, 108, 127, 134, 153}; //Array contenente il numero dei led corrispondenti alla scritta: "Sono le quattro".
int sonoLeCinque[12] = {28, 51, 54, 77, 103, 106, 22, 31, 48, 57, 74, 83}; //Array contenente il numero dei led corrispondenti alla scritta: "Sono le cinque".
int sonoLeSei[9] = {28, 51, 54, 77, 103, 106, 160, 179, 186}; //Array contenente il numero dei led corrispondenti alla scritta: "Sono le sei".
int sonoLeSette[11] = {28, 51, 54, 77, 103, 106, 135, 152, 161, 178, 187}; //Array contenente il numero dei led corrispondenti alla scritta: "Sono le sette".
int sonoLeOtto[10] = {28, 51, 54, 77, 103, 106, 21, 32, 47, 58}; //Array contenente il numero dei led corrispondenti alla scritta: "Sono le otto".
int sonoLeNove[10] = {28, 51, 54, 77, 103, 106, 73, 84, 99, 110}; //Array contenente il numero dei led corrispondenti alla scritta: "Sono le nove".
int sonoLeDieci[11] = {28, 51, 54, 77, 103, 106, 136, 151, 162, 177, 188}; //Array contenente il numero dei led corrispondenti alla scritta: "Sono le dieci".
int sonoLeUndici[12] = {28, 51, 54, 77, 103, 106, 20, 33, 46, 59, 72, 85}; //Array contenente il numero dei led corrispondenti alla scritta: "Sono le undici".
int eMezzogiorno[12] = {25, 24, 29, 50, 55, 76, 81, 102, 107, 128, 133, 154}; //Array contenente il numero dei led corrispondenti alla scritta: "È mezzogiorno".
int eMezzanotte[11] = {25, 19, 34, 45, 60, 71, 86, 97, 112, 123, 138}; //Array contenente il numero dei led corrispondenti alla scritta: "È mezzanotte".

//Array dei minuti:
int cinque[6] = {121, 140, 147, 166, 173, 192}; //Array contenente il numero dei led corrispondenti alla parola: "Cinque".
int dieci[5] = {16, 37, 42, 63, 58}; //Array contenente il numero dei led corrispondenti alla parola: "Dieci".
int venti[5] = {15, 38, 41, 64, 67}; //Array contenente il numero dei led corrispondenti alla parola: "Venti".
int venticinque[11] = {65, 66, 91, 92, 117, 118, 143, 144, 169, 170, 195}; //Array contenente il numero dei led corrispondenti alla parola: "Venticinque".
int trenta[6] = {18, 35, 44, 61, 70, 87}; //Array contenente il numero dei led corrispondenti alla parola: "Trenta".
int trentacinque[12] = {18, 35, 44, 61, 70, 87, 96, 113, 122, 139, 148, 165}; //Array contenente il numero dei led corrispondenti alla parola: "Trentacinque".

//Variabili RGB:
int r = 255;
int g = 0;
int b = 255;

void setup() {
  strip.begin();
  strip.setBrightness(50);
  strip.show();
  Serial.print("ciao");
}

//Metodo che gestisce l'accensione dei led di ogni array.
void ledsOn(int scritta[], int grandezza) {
  for (int i = 0; i < grandezza; i++) {
    strip.setPixelColor(scritta[i], r, g, b);
    strip.show();
    Serial.print("ledON:");
    Serial.println(scritta[i]);
  }
}

//Metodo che spegne tutti i led della striscia.
void spegniStripeLed() {
  for (int i = 0; i < stripeLength; i++) {
    strip.setPixelColor(stripeLength[i], 0, 0, 0);
    strip.show();
    Serial.print("ledOff");
  }
}

//Metodo che gestisce le ore.
//Se i minuti superano i 40 allora incrementa l'ora di 1 e si attiva la parola meno.
void setOra() {
  Serial.println("Gestione ora");
  if (minuti >= 40) {
    ora = ora + 1;
    Serial.print("Ora:");
    Serial.println(ora);
    m = true;
    minutiDaSottrarre = 60 - minuti;
    gestioneMinuti = minutiDaSottrarre % 5;
    if(gestioneMinuti == 0){
      switch(minutiDaSottrarre){
        case 5:
          Serial.print("Minuti da sottrarre: 5");
          ledsOn(cinque, sizeof(cinque));
          break;
        case 10:
          Serial.print("Minuti da sottrarre: 10");
          ledsOn(dieci, sizeof(dieci));
          break;
        case 15:
          Serial.print("Minuti da sottrarre: 15");
          ledsOn(unQuarto, sizeof(unQuarto));
          break;
        case 20:
          Serial.print("Minuti da sottrarre: 20");
          ledsOn(venti, sizeof(venti));
          break;
      }
    }else{
      
    }
  }
}

//Metodo che gestisce i simboli + e -.
//Se la scritta meno non é attiva allora accendo il led corrispondente al simbolo +
//Altrimenti accendo il led corrispondente al -.
void setPiuMeno() {
  if (m != true) {
    strip.setPixelColor(piuMeno[0], r, g, b);
    Serial.println("Simbolo: +");
    setMinutiPallini();
  } else {
    strip.setPixelColor(piuMeno[1], r, g, b);
    Serial.println("Simbolo: -");
    setMinutiPallini();
  }
  strip.show();
}

//Metodo che gestisce i minuti tra l'1 ed il 4 segnalati con i pallini.
//Ad ogni ciclo accendo un led ed incremento i minuti.
void setMinutiPallini() {
  for (int i = 0; i < sizeof(rigaPalliniMinuti); i++) {
    strip.setPixelColor(rigaPalliniMinuti[i], r, g, b);
    Serial.print("Minuti: ");
    Serial.println(minuti);
    minuti = minuti + 1;
    strip.show();
  }
}

//Metodo che gestisce la riga verticale dei secondi rappresentati con dei pallini.
//Se quel determinato secondo é un multiplo di 5 accendo il suo rispettivo led,
//quando arrivo a 60 secondi spengo tutti i led.
void setSecondi() {
  for (int i = 0; i < (int)(secondi / 5); i++) {
    strip.setPixelColor(colonnaSecondi[i], r, g, b);
    Serial.print("Secondi: ");
    Serial.println(secondi);
    strip.show();
  }
}

void loop() {
  setOra();
  Serial.print("Inizio");
  switch (ora) {
    case 0:
      Serial.print("Ora: 0");
      ledsOn(eMezzanotte, sizeof(eMezzanotte));
      break;
    case 1:
      Serial.print("Ora: 1");
      ledsOn(eLUna, sizeof(eLUna));
      break;
    case 2:
      Serial.print("Ora: 2");
      ledsOn(sonoLeDue, sizeof(sonoLeDue));
      break;
    case 3:
      Serial.print("Ora: 3");
      ledsOn(sonoLeTre, sizeof(sonoLeTre));
      break;
    case 4:
      Serial.print("Ora: 4");
      ledsOn(sonoLeQuattro, sizeof(sonoLeQuattro));
      break;
    case 5:
      Serial.print("Ora: 5");
      ledsOn(sonoLeCinque, sizeof(sonoLeCinque));
      break;
    case 6:
      Serial.print("Ora: 6");
      ledsOn(sonoLeSei, sizeof(sonoLeSei));
      break;
    case 7:
      Serial.print("Ora: 7");
      ledsOn(sonoLeSette, sizeof(sonoLeSette));
      break;
    case 8:
      Serial.print("Ora: 8");
      ledsOn(sonoLeOtto, sizeof(sonoLeOtto));
      break;
    case 9:
      Serial.print("Ora: 9");
      ledsOn(sonoLeNove, sizeof(sonoLeNove));
      break;
    case 10:
      Serial.print("Ora: 10");
      ledsOn(sonoLeDieci, sizeof(sonoLeDieci));
      break;
    case 11:
      Serial.print("Ora: 11");
      ledsOn(sonoLeUndici, sizeof(sonoLeUndici));
      break;
    case 12:
      Serial.print("Ora: 12");
      ledsOn(eMezzogiorno, sizeof(eMezzogiorno));
      break;
    default:
      Serial.print("Led spenti:");
      spegniStripeLed();
      break;
  }
  delay(10);
}




