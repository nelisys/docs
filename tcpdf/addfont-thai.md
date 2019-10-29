# TCPDF Add Font Thai

```console
php ./vendor/tecnickcom/tcpdf/tools/tcpdf_addfont.php \
    -b -t TrueTypeUnicode -f 32 \
    -i "THSarabunNew Bold.ttf","THSarabunNew BoldItalic.ttf","THSarabunNew Italic.ttf","THSarabunNew.ttf"

# >>> Converting fonts for TCPDF:
# *** Output dir set to /Users/supasin/Sites/iacuc/vendor/tecnickcom/tcpdf/fonts/
# +++ OK   : /Users/supasin/Sites/iacuc/fonts/THSarabunNew Bold.ttf added as thsarabunnewb
# +++ OK   : /Users/supasin/Sites/iacuc/fonts/THSarabunNew BoldItalic.ttf added as thsarabunnewbi
# +++ OK   : /Users/supasin/Sites/iacuc/fonts/THSarabunNew Italic.ttf added as thsarabunnewi
# +++ OK   : /Users/supasin/Sites/iacuc/fonts/THSarabunNew.ttf added as thsarabunnew
# >>> Process successfully completed!
```

```php
$pdf->SetFont('THSarabunNew', '', 16);
```
