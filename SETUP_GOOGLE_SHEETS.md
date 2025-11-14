# PANDUAN SETUP GOOGLE SHEETS INTEGRATION

## Dashboard Data Subdomain dan OPD Purwakarta

### Konfigurasi Google Sheets API

Dashboard ini sudah dikonfigurasi untuk mengambil data dari Google Sheets. Berikut cara setupnya:

#### 1. **Persiapan Google Sheets**

-   Buat Google Sheets dengan kolom-kolom berikut:
    ```
    nama_opd | domain_count | kecamatan | status | perlu_backup | selesai_backup | perlu_perpanjangan
    ```

#### 2. **Mendapatkan API Key Google Sheets**

-   Kunjungi [Google Cloud Console](https://console.cloud.google.com/)
-   Buat project baru atau pilih project yang sudah ada
-   Aktifkan Google Sheets API
-   Buat API Key di bagian Credentials
-   Copy API Key tersebut

#### 3. **Konfigurasi di Dashboard**

Buka file `resources/views/dashboard/main.blade.php` dan ganti:

```javascript
const SPREADSHEET_ID = "YOUR_SPREADSHEET_ID"; // Ganti dengan ID Google Sheets Anda
const API_KEY = "YOUR_API_KEY"; // Ganti dengan API Key Anda
const SHEET_NAME = "Sheet1"; // Ganti dengan nama sheet Anda
```

Untuk mendapatkan SPREADSHEET_ID:

-   Buka Google Sheets Anda
-   Lihat URL: `https://docs.google.com/spreadsheets/d/SPREADSHEET_ID_ADA_DISINI/edit`
-   Copy bagian SPREADSHEET_ID

#### 4. **Format Data Google Sheets**

Contoh format data yang diharapkan:

```
| nama_opd                          | domain_count | kecamatan  | status      | perlu_backup | selesai_backup | perlu_perpanjangan |
|-----------------------------------|--------------|------------|-------------|--------------|----------------|--------------------|
| Dinas Komunikasi dan Informatika  | 15          | TEGALWARU  | aktif       | 3            | 12             | 2                  |
| Sekretariat Daerah                | 8           | TEGALWARU  | aktif       | 2            | 6              | 1                  |
| Dinas Pendidikan                  | 12          | TEGALWARU  | tidak aktif | 5            | 7              | 3                  |
```

#### 5. **Testing**

-   Buka `/dashboard`
-   Klik tombol "Refresh Data"
-   Data akan otomatis dimuat dari Google Sheets
-   Jika Google Sheets tidak tersedia, sistem akan menggunakan data dari database Laravel sebagai fallback

#### 6. **Upload Data via Admin Panel**

Jika tidak menggunakan Google Sheets, Anda bisa upload data via:

-   Akses `/admin`
-   Pilih "Upload Data"
-   Upload file CSV dengan format yang sudah disediakan

### Fitur Dashboard:

✅ **Real-time Data**: Data diambil dari Google Sheets secara real-time
✅ **Auto Refresh**: Dashboard refresh otomatis setiap 5 menit  
✅ **Fallback System**: Jika Google Sheets tidak tersedia, gunakan database lokal
✅ **Responsive Design**: Tampilan responsive untuk desktop dan mobile
✅ **Interactive Charts**: Chart interaktif dengan Chart.js
✅ **Data Management**: Admin panel untuk manage data via upload CSV

### Troubleshooting:

**Masalah: "No data found"**

-   Pastikan SPREADSHEET_ID benar
-   Pastikan API_KEY valid
-   Pastikan Google Sheets dapat diakses publik
-   Check browser console untuk error messages

**Masalah: Charts tidak muncul**

-   Pastikan data format sesuai dengan yang diharapkan
-   Check browser console untuk JavaScript errors
-   Pastikan Chart.js library ter-load dengan baik

**Masalah: Dashboard loading terus**

-   Check koneksi internet
-   Pastikan Google Sheets API tidak over quota
-   Sistem akan fallback ke database lokal setelah timeout

### Support:

Untuk bantuan lebih lanjut, hubungi tim IT Diskominfo Purwakarta.

---

**Dashboard Version**: 1.0  
**Last Updated**: Oktober 2025  
**Developer**: Tim IT Diskominfo Purwakarta
