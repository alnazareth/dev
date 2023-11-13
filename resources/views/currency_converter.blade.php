<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
</head>
<body>
    <h1>Currency Converter</h1>

    <form action="/convert" method="post">
        @csrf
        <label for="amount">Amount:</label>
        <input type="number" name="amount" required>

        <label for="from">From:</label>
        <select name="from" required>
            @foreach (rates['rates'] as $code => $rate)
                <option value="{{ $code }}">{{ $code }}</option>
            @endforeach
        </select>

        <label for="to">To:</label>
        <select name="to" required>
            @foreach (rates['rates'] as $code => $rate)
                <option value="{{ $code }}">{{ $code }}</option>
            @endforeach
        </select>

        <button type="submit">Convert</button>
    </form>
</body>
</html>
