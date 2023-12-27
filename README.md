## Luhn GSM IMEI Check (Object-Oriented)

>language: .php<br/>
>last update: 27/07/2022<br/>
>author: Ivo Rubim - https://appnexa.net/repository/ivorubim/?f=fs37i<br/>

---

About:<br/>
The International Mobile Equipment Identity (IMEI) is a number, usually unique, to identify 3GPP and iDEN mobile phones, as well as some satellite phones. It is usually found printed inside the battery compartment of the phone but can also be displayed on-screen on most phones by entering `*#06#` MMI Supplementary Service code on the dialpad, or alongside other system information in the settings menu on smartphone operating systems.
<br/><br/>
GSM networks use the IMEI number to identify valid devices, and can stop a stolen phone from accessing the network. For example, if a mobile phone is stolen, the owner can have their network provider use the IMEI number to blacklist the phone. This renders the phone useless on that network and sometimes other networks, even if the thief changes the phone's subscriber identity module (SIM).

---

font-pages:<br/>

about IMEI -- https://en.wikipedia.org/wiki/International_Mobile_Equipment_Identity<br/>
imei examples to test -- https://bmobile.in/lost-imei/<br/>

php.net documentation:<br/>

trim -- https://www.php.net/manual/en/function.trim.php<br/>
strlen -- https://www.php.net/manual/en/function.strlen.php<br/>
is_numeric -- https://www.php.net/manual/en/function.is-numeric.php<br/>
isset -- https://www.php.net/manual/en/function.isset.php<br/>
str_split -- https://www.php.net/manual/en/function.str-split.php<br/>
array_sum -- https://www.php.net/manual/en/function.array-sum.php<br/>
end -- https://www.php.net/manual/en/function.end.php<br/>
intval -- https://www.php.net/manual/en/function.intval.php<br/>
