from rest_framework import serializers
from .models import *


class RestaurantSerializer(serializers.ModelSerializer):
    class Meta:
        model = Restaurant
        fields = (
            'id',
            'name',
            'username',
            'password',
        )
        

class MenuSerializer(serializers.ModelSerializer):
    class Meta:
        model = Menu
        fields = (
            'id',
            'name',
            'restaurant',
        )


class DishSerializer(serializers.ModelSerializer):
    class Meta:
        model = Dish
        fields = (
            'id',
            'name',
            'ingredients',
            'price',
            'menu',
        )


class AreaSerializer(serializers.ModelSerializer):
    class Meta:
        model = Area
        fields = (
            'id',
            'name',
            'width',
            'height',
            'restaurant',
        )


class TableSerializer(serializers.ModelSerializer):
    class Meta:
        model = Table
        fields = (
            'id',
            'number',
            'width',
            'height',
            'x',
            'y',
            'area',
        )


class OrderSerializer(serializers.ModelSerializer):
    class Meta:
        model = Order
        fields = (
            'id',
            'order_time',
            'completed',
            'table',
        )


class OrderDishSerializer(serializers.ModelSerializer):
    class Meta:
        model = OrderDish
        fields = (
            'id',
            'dish',
            'order',
            'count',
        )
