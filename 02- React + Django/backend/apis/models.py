from django.db import models

# Create your models here.
class Restaurant(models.Model):
    name = models.CharField(max_length=32)
    username = models.CharField(max_length=32, unique=True)
    password = models.CharField(max_length=32)


class Menu(models.Model):
    name = models.CharField(max_length=32)
    restaurant = models.ForeignKey(Restaurant, on_delete=models.CASCADE)


class Dish(models.Model):
    name = models.CharField(max_length=32)
    ingredients = models.CharField(max_length=255)
    price = models.DecimalField(max_digits=5, decimal_places=2)
    menu = models.ForeignKey(Menu, on_delete=models.CASCADE)


class Area(models.Model):
    name = models.CharField(max_length=32)
    width = models.IntegerField()
    height = models.IntegerField()
    restaurant = models.ForeignKey(Restaurant, on_delete=models.CASCADE)


class Table(models.Model):
    number = models.IntegerField()
    width = models.IntegerField(default=1)
    height = models.IntegerField(default=1)
    x = models.IntegerField()
    y = models.IntegerField()
    area = models.ForeignKey(Area, on_delete=models.CASCADE)


class Order(models.Model):
    order_time = models.DateTimeField(auto_now_add=True)
    completed = models.BooleanField(default=False)
    table = models.ForeignKey(Table, on_delete=models.CASCADE)


class OrderDish(models.Model):
    dish = models.ForeignKey(Dish, on_delete=models.CASCADE)
    order = models.ForeignKey(Order, on_delete=models.CASCADE)
    count = models.IntegerField()
