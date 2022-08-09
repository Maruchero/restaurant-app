from django.shortcuts import render
from django.views.decorators.csrf import csrf_exempt
from rest_framework.parsers import JSONParser
from django.http import JsonResponse

from .models import *
from .serializers import *

# Create your views here.
def common_api(request, method, ObjectClass, ObjectSerializer):
    if method == "fetchAll":
        objects = ObjectClass.objects.all()
        serializer = ObjectSerializer(objects, many=True)
        return JsonResponse(serializer.data, safe=False)

    elif method == "fetchById":
        data = JSONParser().parse(request)
        object_ = ObjectClass.objects.get(id=data['id'])
        serializer = ObjectSerializer(object_)
        return JsonResponse(serializer.data, safe=False)

    elif method == "add":
        data = JSONParser().parse(request)
        serializer = ObjectSerializer(data=data)
        if serializer.is_valid():
            serializer.save()
            return JsonResponse("Added succesfully", safe=False)
        return JsonResponse(serializer.errors, safe=False)

    elif method == "update":
        data = JSONParser().parse(request)
        object_ = ObjectClass.objects.get(id=data['id'])
        serializer = ObjectSerializer(object_, data=data)
        if serializer.is_valid():
            serializer.save()
            return JsonResponse("Updated succesfully", safe=False)
        return JsonResponse(serializer.errors, safe=False)

    elif method == "delete":
        data = JSONParser().parse(request)
        object_ = ObjectClass.objects.get(id=data['id'])
        object_.delete()
        return JsonResponse("Deleted succesfully", safe=False)


@csrf_exempt
def restaurant_api(request, method):
    return common_api(request, method, Restaurant, RestaurantSerializer)


@csrf_exempt
def menu_api(request, method):
    if (method == "fetchByRestaurantId"):
        data = JSONParser().parse(request)
        objects = Menu.objects.filter(restaurant=data['restaurantId'])
        serializer = MenuSerializer(objects, many=True)
        return JsonResponse(serializer.data, safe=False)
    return common_api(request, method, Menu, MenuSerializer)


@csrf_exempt
def dish_api(request, method):
    if (method == "fetchByMenuId"):
        data = JSONParser().parse(request)
        objects = Dish.objects.filter(menu=data['menuId'])
        serializer = DishSerializer(objects, many=True)
        return JsonResponse(serializer.data, safe=False)
    return common_api(request, method, Dish, DishSerializer)


@csrf_exempt
def area_api(request, method):
    if (method == "fetchByRestaurantId"):
        data = JSONParser().parse(request)
        objects = Area.objects.filter(restaurant=data['restaurantId'])
        serializer = AreaSerializer(objects, many=True)
        return JsonResponse(serializer.data, safe=False)
    return common_api(request, method, Area, AreaSerializer)


@csrf_exempt
def table_api(request, method):
    if method == "fetchByAreaId":
        data = JSONParser().parse(request)
        objects = Table.objects.filter(area=data['areaId'])
        serializer = TableSerializer(objects, many=True)
        return JsonResponse(serializer.data, safe=False)
    return common_api(request, method, Table, TableSerializer)


@csrf_exempt
def order_api(request, method):
    if method == "fetchByTableId":
        data = JSONParser().parse(request)
        objects = Order.objects.filter(table=data['tableId'])
        serializer = OrderSerializer(objects, many=True)
        return JsonResponse(serializer.data, safe=False)
    return common_api(request, method, Order, OrderSerializer)


@csrf_exempt
def order_dish_api(request, method):
    if method == "fetchByOrderId":
        data = JSONParser().parse(request)
        objects = OrderDish.objects.filter(order=data['orderId'])
        serializer = OrderDishSerializer(objects, many=True)
        return JsonResponse(serializer.data, safe=False)
    return common_api(request, method, OrderDish, OrderDishSerializer)
