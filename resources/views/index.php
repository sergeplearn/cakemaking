if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
         
            $file->move(public_path('images'), $filename);
            

        }

       
        if ($request->hasfile('image')) {
            $img = $request->file('image');
            $extension = $img->getClientOriginalExtension();
            $names = time().'.'.$extension;
          $image = Image::make(public_path('images/'.$names))->resize(20, 20);
          $image->blur();
            $image->save(public_path('bgimg/'.$names),80);

       }