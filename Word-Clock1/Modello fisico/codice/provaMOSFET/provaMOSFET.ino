void setup() {
  // put your setup code here, to run once:

  pinMode(A0, OUTPUT);
  pinMode(A1, OUTPUT);
  pinMode(A2, OUTPUT);
  pinMode(A3, OUTPUT);

}

void loop() {
  // put your main code here, to run repeatedly:

  /*analogWrite(A0, 255);
  analogWrite(A1, 255);
  analogWrite(A2, 255);
  analogWrite(A3, 255);
  delay(1000); 
  analogWrite(A0, 0);
  analogWrite(A1, 0);
  analogWrite(A2, 0);
  analogWrite(A3, 0);
  
  delay(1000);
  analogWrite(A0, 0);
  analogWrite(A1, 255);
  analogWrite(A2, 0);
  analogWrite(A3, 255);
  delay(1000);*/
  analogWrite(A0, 0);
  analogWrite(A1, 255);
  analogWrite(A2, 0);
  analogWrite(A3, 255);
  delay(8);
  /*analogWrite(A0, 255);
  analogWrite(A1, 0);
  analogWrite(A2, 255);
  analogWrite(A3, 0);*/
  delay(8);
}
