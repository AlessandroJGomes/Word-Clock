#include <Time.h>
#include <TimeLib.h>

#include <DCF77.h>

 

 
char time_s[9];
char date_s[11];
 
#define DCF_PIN 2           // Connection pin to DCF 77 device
#define DCF_INTERRUPT 0    // Interrupt number associated with pin
 
time_t time;
DCF77 DCF = DCF77(DCF_PIN,DCF_INTERRUPT);
 
void setup() {
  Serial.begin(9600); 
  DCF.Start();
  Serial.println("Warte auf Zeitsignal ... ");
  Serial.println("Dies kann 2 oder mehr Minuten dauern.");
}
 
void loop() {
 
  delay(1000);
  
  time_t DCFtime = DCF.getTime(); // Nachschauen ob eine neue DCF77 Zeit vorhanden ist
  //Serial.println(digitalRead(DCF_PIN));
 
  if (DCFtime != 0)
  {
    
    setTime(DCFtime); //Neue Systemzeit setzen
    Serial.print("Neue Zeit erhalten : "); //Ausgabe an seriell
    Serial.print(sprintTime()); 
    Serial.print("  "); 
    Serial.println(sprintDate());   
  } 
  
  //---> hier könnte man die Ausgabe auch auf ein LCD schicken.
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
