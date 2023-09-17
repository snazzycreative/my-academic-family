@if(@$section['alternating'])
  @extends('sections.section.section', $section)

  @section('pagebuilder-block-content')
    <div class="section-alternating-wrap">
      @foreach($section['alternating'] as $row)
        <div class="section-alternating-row">
          <div class="section-alternating-col section-alternating-image bg-black">
            @if(@$row['image']['ID'])
              {!! \App\frontend\img_srcset([
                'name' => 'overview',
                'image' => $row['image']['ID'],
                'lazy' => true,
              ]) !!}
            @endif
          </div>
          <div class="section-alternating-col section-alternating-content">
            <div class="content-position">
              <div class="section container">
                <div class="wysiwyg">
                  @if(@$row['content']['heading'])
                    <h3>{!! $row['content']['heading'] !!}</h3>
                  @endif

                  {!! apply_filters('the_content', @$row['content']['text']) !!}
                </div>

                @include('partials.buttons', ['links' => @$row['content']['links']])
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @overwrite
@endif

