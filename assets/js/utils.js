function calcFinal(a, b, c, d, e) {
    a = parseFloat(a);
    b = parseFloat(b);
    c = parseFloat(c);
    d = parseFloat(d);
    e = parseFloat(e);
    if (!a || !b || !c || !d || !e) {
        return '';
    } else {
        let final = 0;
        final = (a + b + c + d + e * 6) / 10;
        final = final.toFixed(2);
        final = parseFloat(final);
        return final;
    }
}

function calc(final) {
    if ((final == '' || !final) && final != '0') {
        return '';
    }

    final = parseFloat(final);
    if (final < 4) {
        return 'F';
    } else if (final < 5) {
        return 'D';
    } else if (final < 5.5) {
        return 'D+';
    } else if (final < 6.5) {
        return 'C';
    } else if (final < 7) {
        return 'C+';
    } else if (final < 8) {
        return 'B';
    } else if (final < 8.5) {
        return 'B+';
    } else if (final < 9) {
        return 'A';
    } else {
        return 'A+';
    }
}