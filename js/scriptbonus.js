function staircase(n) {

    // here we use just one for loop where i tracks the number of rows
    // the number of rows (i) should be less than or equal to n
    for (let i = 1; i <= n; i++) {
        // print out a " " n-i times and append a # i times
        // console log adds a new line by default

        console.log(" ".repeat(n-i) + "#".repeat(i))
        }
    }

    //Suite de Fibonnaci 
    function fibonacci(nbr) {
        var n1 = 0;
        var n2 = 1;
        var somme = 0;

        for (let i = 2; i <= nbr; i++) {
            //somme des deux derniers nombres
            somme = n1 + n2;
            //assigner la dernière valeur à la première
            n1 = n2;
            //attribuer la somme au dernier
            n2 = somme;
        }

        return nbr ? n2 : n1;
    }
    console.log(fibonacci(8));

    //Leap Year  Année paire ou impaire
    function isLeapYear(year) {
        return new Date(year, 1, 29).getDate() === 29
    }

    isLeapYear(2019) // false
    isLeapYear(2020) // true

    // Yesterday I had a scare,
    // I ran some code that wasn't there,
    //  It wasn't there again today;
    //  Oh, how I wish that it would stay.