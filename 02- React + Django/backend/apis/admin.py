from django.contrib import admin

# Register your models here.
from .models import Restaurant, Menu, Dish, Area, Table, Order, OrderDish


admin.site.register(Restaurant)
admin.site.register(Menu)
admin.site.register(Dish)
admin.site.register(Area)
admin.site.register(Table)
admin.site.register(Order)
admin.site.register(OrderDish)
