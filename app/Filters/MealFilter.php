<?php
namespace App\Filters;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMealRequest;
use App\Models\Meal;
use App\Models\MealTranslation;

class MealFilter{
    public function filter(StoreMealRequest $request){
        $query = Meal::query();
        $diff_time = $request->diff_time;
        $with = $request->with;
        $category = $request->category;
        $tags = $request->tags;
        
        if(isset($diff_time)){
            $this->diff_timefilter($query, $diff_time);
        }

        if(isset($with)){
            $this->withfilter($query, $with);
        }
        if(isset($category)){
            $this->categoryfilter($query, $category);
        }
        if(isset($tags)){
            $this->tagfilter($query, $tags);
        }
        

        return $query;
    }

    protected function diff_timefilter($query, $diff_time){
        $query->withTrashed()->where(function($q) use ($diff_time) {
            $q->where('created_at', '>', date('Y-m-d H:i:s', $diff_time))
            ->orWhere('updated_at', '>', date('Y-m-d H:i:s', $diff_time))
            ->orWhere('deleted_at', '>', date('Y-m-d H:i:s', $diff_time));
        });
    }

    protected function withfilter($query, $with){
        if(isset($with)){
            $with = explode(',',$with);
            
            if(in_array('tags', $with)){
                $query->with('tags');
            }

            if(in_array('ingredients', $with)){
                $query->with('ingredients');
            }

            if(in_array('category', $with)){
                $query->with('categories');
            }
        }
    }

    protected function categoryfilter($query, $category){
        if(isset($category)){
            if(strtolower($category) == 'null'){
                $query->whereNull('category_id');
            }
            elseif(strtolower($category) == '!null'){
                $query->whereNotNull('category_id');
            }
            else{
                $query->where('category_id', $category);
            }
        }
    }

    protected function tagfilter($query, $tags){
        $tags = explode(',', $tags);
        foreach($tags as $tag){
            $query->whereHas('tags', function($q) use($tag){
                $q->where('tags.id', $tag);
            });
        }
    }
}

/* if ($request->has('diff_time')) 
        {
            $diffTime = Carbon::createFromTimestamp($request->input('diff_time'));
            $meals = $query->withTrashed()
                           ->where(function ($q) use ($diffTime) 
                           {
                               $q->where('created_at', '>', $diffTime)
                                 ->orWhere('updated_at', '>', $diffTime)
                                 ->orWhere('deleted_at', '>', $diffTime);
                           })
                           ->get();
            
            foreach ($meals as $meal) 
            {
                $meal->makeVisible('status');
                if ($meal->deleted_at && $meal->deleted_at->gt($diffTime)) 
                {
                    $meal->status = 'deleted';
                } 
                elseif ($meal->created_at->gt($diffTime) && $meal->created_at == $meal->updated_at) 
                {
                    $meal->status = 'created';
                } 
                elseif ($meal->updated_at->gt($diffTime)) 
                {
                    $meal->status = 'modified';
                }
            }

            return MealResource::collection($meals);
        }
 */