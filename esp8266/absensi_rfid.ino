String ruang = "1";

#include <ESP8266HTTPClient.h>
#include <ESP8266Wifi.h>

#include <SPI.h>
#include <MFRC522.h>

// Network SSID
const char* ssid = "putra";
const char* password = "pulupuluq";

// Pengenal host
const char* host = "192.168.43.137";

// Lampu LED
#define LED_PIN 15 // D8
#define BTN_PIN 5 // D1

// Sensor RFID
#define SDA_PIN 2 // D4
#define RST_PIN 0 // D3
MFRC522 sensor(SDA_PIN, RST_PIN);

WiFiClient client;

void setup() {
  Serial.begin(9600);

  // Setting koneksi WiFi
  WiFi.hostname("NodeMCU");
  WiFi.begin(ssid, password);

  // cek koneksi WiFi
  while(WiFi.status() != WL_CONNECTED) {
    // print program pencarian WiFi
    delay(1000);
    Serial.println(".");
  }

  Serial.println("WiFi sudah terhubung.");
  Serial.print("IP Address: ");
  Serial.println(WiFi.localIP());
  Serial.println("");
  Serial.println("");

  pinMode(LED_PIN, OUTPUT);
  pinMode(BTN_PIN, OUTPUT);

  SPI.begin();
  sensor.PCD_Init();
  Serial.println("Sensor sudah siap.");
  Serial.println("Dekatkan kartu pengenal Anda ke sensor!");
}

void loop() {
  // cek aktifitas tombol
  if(digitalRead(BTN_PIN) == 1) {
    // nyalakan lampu
    digitalWrite(LED_PIN, HIGH);
    while(digitalRead(BTN_PIN) == 1);
    
    // ubah mode absensi
    String getData, Link;
    HTTPClient http;

    // Get Data
    Link = "http://192.168.43.137/project_pkk/absensi_rfid/ubah_mode.php";
    http.begin(client, Link);

    int httpCode = http.GET();
    String payload = http.getString();

    Serial.println(payload);
    http.end();

  }

  // matikan lampu LED
 digitalWrite(LED_PIN, LOW); 

 
  if(!sensor.PICC_IsNewCardPresent() && !sensor.PICC_ReadCardSerial()) {
    return;
  }

  String IDTAG = "";
  for(byte i = 0; i < sensor.uid.size; i++) {
    IDTAG += sensor.uid.uidByte[i];
  }

  // nyalakan lampu LED
  digitalWrite(LED_PIN, HIGH);

  const int httpPort = 80;
  if(!client.connect(host, httpPort)) {
    Serial.println("Koneksi Gagal!");
    return;
  }

  String Link;
  HTTPClient http;
  Link = "http://192.168.43.137/project_pkk/absensi_rfid/kirim_kartu.php?nokartu=" + IDTAG + "&ruang=" + ruang;
  http.begin(client, Link);

  int httpCode = http.GET();
  String payload = http.getString();
  Serial.println(payload);
  http.end();

  delay(2000);
}
