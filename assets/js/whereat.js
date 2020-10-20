import Vue from 'vue';
import Welcome from 'Components/welcome';
import Search from 'Components/search';

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
