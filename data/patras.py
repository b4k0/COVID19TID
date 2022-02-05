import populartimes
import json


########################################################
#Function to get POIs of specific categories only.
#apikey: your google maps api key
#types_arr: an array of strings with the categories, see https://developers.google.com/maps/documentation/places/web-service/supported_types
#fname: the filename to save the returned JSON
#ub: upper bound coordinates (north east)
#lb: lower bound coordinates (south west)
########################################################

def get_specific_categories(apikey, types_arr, ub, lb, fname):
    mega_array = []
    counter = 0
    for i in range(len(types_arr)):
        print(types_arr[i])
        res = populartimes.get(apikey, types=[types_arr[i]], p1=ub, p2=lb, all_places=False)
        counter = len(res)
        print ("Found "+str(counter)+" places of type: "+types_arr[i])
        mega_array.extend(res)

    with open(fname+".json", "w", encoding="utf8") as outfile:
        json.dump(mega_array, outfile, ensure_ascii=False)

########################################################
#Function to get POIs of any type in a region.
#apikey: your google maps api key
#fname: the filename to save the returned JSON
#ub: upper bound coordinates (north east)
#lb: lower bound coordinates (south west)
########################################################

def get_all_pois(apikey, ub, lb, fname):
    res = populartimes.get(apikey, types=[], p1=ub, p2=lb, all_places=False)
    counter = len(res)
    print ("Found "+str(counter)+" places")

    with open(fname+".json", "w", encoding="utf8") as outfile:
        json.dump(res, outfile, ensure_ascii=False)

########################################################
# Running examples
########################################################

api_key="<Your API key here>"
upper_bound = (38.250822, 21.740267)
lower_bound = (38.249632, 21.735974)
types=["supermarket", "cafe", "clothing_store"]

#example call to get some places of specific categories
get_specific_categories(api_key, types, upper_bound, lower_bound, "specific")

#example call to get some places of any type category
get_all_pois(api_key, upper_bound, lower_bound, "generic")
