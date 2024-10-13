<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MultiSelect extends Component
{
    /**
     * Create a new component instance.
     */
    public $model,$inputLabel,$textField,$valueField,$firstLabelItem,$inputStyle,$inputClass,$inputName,$inputNameText,$inputId,$inputLabelClass,$inputLabelStyle,$data,$options,$selectedItems=[];
    public function __construct($inputLabel,$textField,$valueField,$firstLabelItem,$inputId,$inputName,$inputNameText,$selectedItems=[],$dataType="model",$data=null,$model = null,$inputClass="",$inputStyle="",$inputLabelStyle="",$inputLabelClass="")
    {
        $this->model=$model;
        $this->inputLabel = $inputLabel;
        $this->textField = $textField;
        $this->valueField = $valueField;
        $this->firstLabelItem = $firstLabelItem;
        $this->inputId = $inputId;
        $this->inputName = $inputName;
        $this->inputClass = $inputClass;
        $this->inputStyle = $inputStyle;
        $this->inputLabelClass = $inputLabelClass;
        $this->inputLabelStyle = $inputLabelStyle;
        $this->data = $data;
        $this->inputNameText = $inputNameText;
        if($model && isset($model) && !empty($model))
        {
            $this->options = $model::get([$this->textField,$this->valueField]);
        }
        else
        {
            $this->options = $data;
        }
        if($selectedItems && isset($selectedItems) && !empty($selectedItems))
        {
            $this->selectedItems = $selectedItems ?? [];
        }
        else
        {
            $this->selectedItems = old($inputNameText) ?? [];
        }



    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.multi-select');
    }
}
