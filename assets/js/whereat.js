import Vue from 'vue';
import Welcome from './components/welcome';
import Search from './components/search';

document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById('app')) {
        new Vue({
            el: '#app',
            render: function (h) {
                return (
                    <div>
                        <Welcome />
                        <Search />
                    </div>
                )
            }
        })
    }
})
