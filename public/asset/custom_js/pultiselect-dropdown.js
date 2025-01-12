var style = document.createElement('style');
style.setAttribute("id", "pultiselect_dropdown_styles");
style.innerHTML = `
.pultiselect-dropdown{
  display: inline-block;
  padding: 2px 5px 0px 5px;
  border-radius: 4px;
  border: solid 1px #ced4da;
  background-color: white;
  position: relative;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: right .75rem center;
  background-size: 16px 12px;
}
.pultiselect-dropdown span.optext, .pultiselect-dropdown span.placeholder{
  margin-right:0.5em; 
  margin-bottom:2px;
  padding:1px 0; 
  border-radius: 4px; 
  display:inline-block;
}
.pultiselect-dropdown span.optext{
  background-color:lightgray;
  padding:1px 0.75em; 
}
.pultiselect-dropdown span.optext .optdel {
  float: right;
  margin: 0 -6px 1px 5px;
  font-size: 0.7em;
  margin-top: 2px;
  cursor: pointer;
  color: #666;
}
.pultiselect-dropdown span.optext .optdel:hover { color: #c66;}
.pultiselect-dropdown span.placeholder{
  color:#ced4da;
}
.pultiselect-dropdown-list-wrapper{
  box-shadow: gray 0 3px 8px;
  z-index: 100;
  padding:2px;
  border-radius: 4px;
  border: solid 1px #ced4da;
  display: none;
  margin: -1px;
  position: absolute;
  top:0;
  left: 0;
  right: 0;
  background: white;
}
.pultiselect-dropdown-list-wrapper .pultiselect-dropdown-search{
  margin-bottom:5px;
}
.pultiselect-dropdown-list{
  padding:2px;
  height: 15rem;
  overflow-y:auto;
  overflow-x: hidden;
}
.pultiselect-dropdown-list::-webkit-scrollbar {
  width: 6px;
}
.pultiselect-dropdown-list::-webkit-scrollbar-thumb {
  background-color: #bec4ca;
  border-radius:3px;
}

.pultiselect-dropdown-list div{
  padding: 5px;
}
.pultiselect-dropdown-list input{
  height: 1.15em;
  width: 1.15em;
  margin-right: 0.35em;  
}
.pultiselect-dropdown-list div.checked{
}
.pultiselect-dropdown-list div:hover{
  background-color: #ced4da;
}
.pultiselect-dropdown span.maxselected {width:100%;}
.pultiselect-dropdown-all-selector {border-bottom:solid 1px #999;}
`;
document.head.appendChild(style);

function PultiselectDropdown(options) {
  var config = {
    search: true,
    height: '15rem',
    placeholder: 'select',
    txtSelected: 'selected',
    txtAll: 'All',
    txtRemove: 'Remove',
    txtSearch: 'search',
    ...options
  };
  function newEl(tag, attrs) {
    var e = document.createElement(tag);
    if (attrs !== undefined) Object.keys(attrs).forEach(k => {
      if (k === 'class') { Array.isArray(attrs[k]) ? attrs[k].forEach(o => o !== '' ? e.classList.add(o) : 0) : (attrs[k] !== '' ? e.classList.add(attrs[k]) : 0) }
      else if (k === 'style') {
        Object.keys(attrs[k]).forEach(ks => {
          e.style[ks] = attrs[k][ks];
        });
      }
      else if (k === 'text') { attrs[k] === '' ? e.innerHTML = '&nbsp;' : e.innerText = attrs[k] }
      else e[k] = attrs[k];
    });
    return e;
  }


  document.querySelectorAll('.pultiselect').forEach((el, k) => {

    var div = newEl('div', { class: 'pultiselect-dropdown', style: { width: config.style?.width ?? el.clientWidth + 'px', padding: config.style?.padding ?? '' } });
    el.style.display = 'none';
    el.parentNode.insertBefore(div, el.nextSibling);
    var listWrap = newEl('div', { class: 'pultiselect-dropdown-list-wrapper' });
    var list = newEl('div', { class: 'pultiselect-dropdown-list', style: { height: config.height } });
    var search = newEl('input', { class: ['pultiselect-dropdown-search'].concat([config.searchInput?.class ?? 'form-control']), style: { width: '100%', display: el.attributes['pultiselect-search']?.value === 'true' ? 'block' : 'none' }, placeholder: config.txtSearch });
    listWrap.appendChild(search);
    div.appendChild(listWrap);
    listWrap.appendChild(list);

    el.loadOptions = () => {
      list.innerHTML = '';

      if (el.attributes['pultiselect-select-all']?.value == 'true') {
        var op = newEl('div', { class: 'pultiselect-dropdown-all-selector' })
        var ic = newEl('input', { type: 'checkbox' });
        // var imageSrc = 'path/to/all-selector-image.jpg'; // Replace with the path to your image
        // var img = newEl('img', { src: imageSrc, class: 'all-selector-image', style: { width: '30px', height: '30px', marginRight: '10px' } });
        op.appendChild(ic);
        // op.appendChild(img);
        op.appendChild(newEl('label', { text: config.txtAll }));


        op.addEventListener('click', () => {
          op.classList.toggle('checked');
          op.querySelector("input").checked = !op.querySelector("input").checked;

          var ch = op.querySelector("input").checked;
          list.querySelectorAll(":scope > div:not(.pultiselect-dropdown-all-selector)")
            .forEach(i => { if (i.style.display !== 'none') { i.querySelector("input").checked = ch; i.optEl.selected = ch } });

          el.dispatchEvent(new Event('change'));
        });
        ic.addEventListener('click', (ev) => {
          ic.checked = !ic.checked;
        });

        list.appendChild(op);
      }

      Array.from(el.options).map(o => {
        var op = newEl('div', { class: o.selected ? 'checked' : '', optEl: o })
        var ic = newEl('input', { type: 'checkbox', checked: o.selected });
        op.appendChild(ic);
        op.appendChild(newEl('label', { text: o.text }));

        op.addEventListener('click', () => {
          op.classList.toggle('checked');
          op.querySelector("input").checked = !op.querySelector("input").checked;
          op.optEl.selected = !!!op.optEl.selected;
          el.dispatchEvent(new Event('change'));
        });
        ic.addEventListener('click', (ev) => {
          ic.checked = !ic.checked;
        });
        o.listitemEl = op;
        list.appendChild(op);
      });
      div.listEl = listWrap;

      div.refresh = () => {
        div.querySelectorAll('span.optext, span.placeholder').forEach(t => div.removeChild(t));
        var sels = Array.from(el.selectedOptions);
        if (sels.length > (el.attributes['pultiselect-max-items']?.value ?? 5)) {
          div.appendChild(newEl('span', { class: ['optext', 'maxselected'], text: sels.length + ' ' + config.txtSelected }));
        }
        else {
          sels.map(x => {
            var c = newEl('span', { class: 'optext', text: x.text, srcOption: x });
            if ((el.attributes['pultiselect-hide-x']?.value !== 'true'))
              c.appendChild(newEl('span', { class: 'optdel', text: '🗙', title: config.txtRemove, onclick: (ev) => { c.srcOption.listitemEl.dispatchEvent(new Event('click')); div.refresh(); ev.stopPropagation(); } }));

            div.appendChild(c);
          });
        }
        if (0 == el.selectedOptions.length) div.appendChild(newEl('span', { class: 'placeholder', text: el.attributes['placeholder']?.value ?? config.placeholder }));
      };
      div.refresh();
    }
    el.loadOptions();

    search.addEventListener('input', () => {
      list.querySelectorAll(":scope div:not(.pultiselect-dropdown-all-selector)").forEach(d => {
        var txt = d.querySelector("label").innerText.toUpperCase();
        d.style.display = txt.includes(search.value.toUpperCase()) ? 'block' : 'none';
      });
    });

    div.addEventListener('click', () => {
      div.listEl.style.display = 'block';
      search.focus();
      search.select();
    });

    document.addEventListener('click', function (event) {
      if (!div.contains(event.target)) {
        listWrap.style.display = 'none';
        div.refresh();
      }
    });
  });
}

// window.addEventListener('load',()=>{
//   PultiselectDropdown(window.PultiselectDropdownOptions);
// });
