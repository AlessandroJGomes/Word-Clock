#include <DCF77.h>

#include <TimeLib.h>

char time_s[9];
char date_s[11];

#define DCF_PIN A0                // Connection pin to DCF 77 device
#define DCF_INTERRUPT 0          // Interrupt number associated with pin

time_t tempo;
// Non-inverted input on pin DCF_PIN
DCF77 DCF = DCF77(DCF_PIN,DCF_INTERRUPT, true); 

void setup() {
  Serial.begin(9600); 
  DCF.Start();
  Serial.println("Waiting for DCF77 time ... ");
  Serial.println("It will take at least 2 minutes before a first time update.");
}


    


void loop() {
  delay(1000);
  
  Serial.println(analogRead(DCF_PIN));
  time_t DCFtempo = DCF.getTime(); // Check if new DCF77 time is available
  Serial.println(DCFtempo);
  
  if (DCFtempo!=0)
  {
    Serial.println("ciao");
    setTime(DCFtempo); //Neue Systemzeit setzen
    Serial.print("Neue Zeit erhalten : "); //Ausgabe an seriell
    Serial.print(sprintTime()); 
    Serial.print("  "); 
    Serial.println(sprintDate());
    
    Serial.println(DCFtempo);
    setTime(DCFtempo);
  }     
  //digitalClockDisplay();  
}

char* sprintTime() {
  snprintf(time_s,sizeof(time_s),"%.2d:%.2d:%.2d" , hour(), minute(), second());
  time_s[strlen(time_s)] = '\0';
  return time_s;
}

char* sprintDate() {
  snprintf(date_s,sizeof(date_s),"%.2d.%.2d.%.4d" , day(), month(), year());
  date_s[strlen(date_s)] = '\0';
  return date_s;
}

void digitalClockDisplay(){
  //digital clock display of the time
 Serial.print(hour());
  printDigits(minute());
  printDigits(second());
  Serial.print(" ");
  Serial.print(day());
  Serial.print(" ");
  Serial.print(month());
  Serial.print(" ");
  Serial.print(year()); 
  Serial.println(); 
}

void printDigits(int digits){
  // utility function for digital clock display: prints preceding colon and leading 0
  Serial.print(":");
  if(digits < 10)
    Serial.print('0');
  Serial.print(digits);
}

