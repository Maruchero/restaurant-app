from django.urls import path

from .views import restaurantApi, menuApi, dishApi, areaApi, tableApi, orderApi, orderDishApi

urlpatterns = [
    path('restaurant/', restaurantApi),
    path('menu/', menuApi),
    path('dish/', dishApi),
    path('area/', areaApi),
    path('table/', tableApi),
    path('order/', orderApi),
    path('orderDish/', orderDishApi),
]