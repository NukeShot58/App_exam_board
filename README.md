# What is this?
This is an app that has been requested by the school to track the exam board.
## Requirements:
- wyznaczać komisje do egzaminów
- na pewno dane nauczyciela(imie, nazwisko, nrTel, nauPrzed)
- wyznacz automatyczne równomiernie nauczycieli z naszej szkoły od komisji
- tabela przedmioty(nazwaPrzed, Zawodowy [string])
- Nauczyciel z naszej szkoły może być jako przewodniczący komisji lub asystent techniczny(nie przydzielać do komisji) lub operator systemu(nie przydzielać do komisji)
- asystent techniczny i operator systemu przydzielani ręcznie
- Nauczyciele lub egzaminatorzy z zewnątrz
- Teoria - nauczyciel z zewnątrz(część komisji)
- Praktyka - nauczyciel z zewnątrz(egzaminator albo część komisji [zależnie od egzaminu])
- komisja 2 osoby(1 przewodniczący nasza szkoła, 2 osoba z zewnątrz[Ręcznie dodawana])
- ilość członków komisji jako zmienna [2]
- egzamin (dataGodzzina; sala; kwalyfikacja; typ [w, wk, d, dk])[Ręcznie edytowane] 
- przydziela automatycznie tylko naszych nauczycieli
- i nauczyciel może być na dwóch sesjach obok siebie [?]
- jak program wylosuje nauczyciela wchodzimy w edycję egzaminu i dopisujemy ręcznie nauczyciela z zewnątrz; zaznaczamy czy to członek czy egzaminator [Jeżeli brak listy z zewnątrz]
- w egzaminach pisemnych jest operator(operator wiele sal na raz)
- w egzaminach praktycznych asystent techniczny na całą sesję
### II możliwość <-
- wprowadzamy tylko ilość egzaminów konkretnego typu
- program przydziela tylko nauczycieli z naszej szkoły reszta ręcznie(program tworzy komisję)
### Additional
- wygenerowany plik pdf z pólą komisji

## In short:
### Tables:
- egzamin (egzaminID; dataGodzzina [datetime not null]; sala; kwalyfikacja; typ [w, wk, d, dk]; techNauID)[Ręcznie edytowane],
- nauczyciela(nauczycielID; imie; nazwisko; nrTel; nauPrzed)[dane podane],
- przedmioty(nazwaPrzed(ID); Zawodowy [string])[dane podane],
- komisja(komisjaID; egzaminID; zew_nau_ID;nau_1_ID)[wiele do jednego egzaminu],
- zew_nauczyciel(zew_nau_ID; Imie; Nazwisko; rola[członek/egzaminator])[dodawane przez użytkownika] [?]


https://www.youtube.com/watch?v=i9-dJXsdFRU&ab_channel=PhpBackAgain




