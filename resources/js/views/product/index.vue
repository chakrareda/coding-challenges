<template>
    <data-viewer :source="source" :thead="thead" :filter="filter" :create="create" :title="title">
        <template scope="props">
            <tr @click="$router.push('/invoice/' + props.item.id)">
                <td>{{props.item.id}}</td>
                <td>{{props.item.name}}</td>
                <td>{{props.item.category.name}}</td>
                <td>{{props.item.description}}</td>
                <td>{{props.item.price}}</td>
                <td>{{props.item.image}}</td>
                <td>{{props.item.created_at}}</td>
            </tr>
        </template>
    </data-viewer>
</template>
<script>
    import DataViewer from '../../components/DataViewer.vue'

    export default {
        name: 'ProductIndex',
        data() {
            return {
                title: 'Products',
                source: '/api/product',
                create: '/product/create',
                thead: [
                    {title: 'ID', key: 'id', sort: true},
                    {title: 'Name', key: 'name', sort: true},
                    {title: 'Category', key: 'category', sort: false},
                    {title: 'Description', key: 'description', sort: true},
                    {title: 'Price', key: 'price', sort: true},
                    {title: 'Image', key: 'image', sort: true},
                    {title: 'Created At', key: 'created_at', sort: true}
                ],
                filter: [
                    'id', 'category_id', 'name', 'description', 'price', 'image',
                     'created_at',
                    'category.id', 'customer.name', 'customer.created_at'
                ]
            }
        },
        components: {
            DataViewer
        }
    }
</script>