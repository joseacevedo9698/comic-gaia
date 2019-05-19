$("#titulo_id").easyAutocomplete({
    url: function(search) {
        return "{{route('titulo.fetch')}}?search=" + search;
    },
    theme: "bootstrap",
    getValue: "nombre",
    list: {
        maxNumberOfElements: 5,
        match: {
            enabled: true
        }
    }
});

$("#autor_id").easyAutocomplete({
    url: function(search) {
        return "{{route('autor.fetch')}}?search=" + search;
    },
    theme: "bootstrap",
    getValue: "nombre",
    list: {
        maxNumberOfElements: 5,
        match: {
            enabled: true
        }
    }
});

$("#dibujante_id").easyAutocomplete({
    url: function(search) {
        return "{{route('dibujante.fetch')}}?search=" + search;
    },
    theme: "bootstrap",
    getValue: "nombre",
    list: {
        maxNumberOfElements: 5,
        match: {
            enabled: true
        }
    }
});

$("#editoria_id").easyAutocomplete({
    url: function(search) {
        return "{{route('editorial.fetch')}}?search=" + search;
    },
    theme: "bootstrap",
    getValue: "nombre",
    list: {
        maxNumberOfElements: 5,
        match: {
            enabled: true
        }
    }
});
