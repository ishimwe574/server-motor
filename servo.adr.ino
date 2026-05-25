

#include <Servo.h>

Servo doorServo;

String command;

void setup() {
  Serial.begin(9600);
  doorServo.attach(9);
  doorServo.write(0); // door closed
}

void loop() {

  if (Serial.available()) {
    command = Serial.readStringUntil('\n');

    if (command == "OPEN") {
      doorServo.write(90);
      Serial.println("OPENED");
    }

    if (command == "CLOSE") {
      doorServo.write(0);
      Serial.println("CLOSED");
    }
  }
}
