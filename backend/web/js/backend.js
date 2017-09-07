var backend = {

    loadTaxonomy: function(element, select) {
        var self = this;
        var client = new $.RestClient('/api/');

        client.add('taxonomy');
        client.taxonomy.read().done(function(data) {
            self.buildList(element, select, data);
        });
    },

    loadParentTerm: function(element, select, taxonomy_id) {
        var self = this;
        var client = new $.RestClient('/api/');

        client.add('term');
        client.term.read({'taxonomy_id' : taxonomy_id, parent_id: null}).done(function(data) {
            self.buildList(element, select, data);
        });
    },

    buildList: function(element, select, data) {
        $(element).find('option').not(':first').remove();
        for (key in data) {
            $(element).append($('<option>', {
                value : data[key]['id'],
                text : data[key]['name'],
                selected: (select == data[key]['id'])
            }));
        }
    }
};