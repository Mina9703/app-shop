const { algoliasearch, instantsearch } = window;

const searchClient = algoliasearch(
  'A8Q793R065',
  '05f72013f6584da7340e2c2e430d8a51'
);

const search = instantsearch({
  indexName: 'trainers',
  searchClient,
  future: { preserveSharedStateOnUnmount: true },
});

search.addWidgets([
  instantsearch.widgets.searchBox({
    container: '#searchbox',
  }),
  instantsearch.widgets.hits({
    container: '#hits',
    templates: {
      item: (hit, { html, components }) => html`
        <article>
          <img src=${hit.avatar} alt=${hit.id} />
          <div>
            <h1>${components.Highlight({ hit, attribute: 'id' })}</h1>
            <p>${components.Highlight({ hit, attribute: 'name' })}</p>
            <p>${components.Highlight({ hit, attribute: 'created_at' })}</p>
          </div>
        </article>
      `,
    },
  }),
  instantsearch.widgets.configure({
    hitsPerPage: 8,
  }),
  instantsearch.widgets.pagination({
    container: '#pagination',
  }),
]);

search.start();
