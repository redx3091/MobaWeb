let options = {
    numberPerPage:5, 
    goBar:true, 
    pageCounter:true
};
let filterOptions = {
    el:'#filterBox'
};
paginate.init('#table-gest', options, filterOptions);