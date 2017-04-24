import argparse
import os
from utils import Service, encode_image


def main(photo_file):
    access_token = os.environ.get('VISION_API')
    service = Service('vision', 'v1', access_token="AIzaSyDZyEjcFTrDtE-RHDCTlb44-FJo-i2emdg")

    with open(photo_file, 'rb') as image:
        base64_image = encode_image(image)
        body = {
            'requests': [{
                'image': {
                    'content': base64_image,
                },
                'features': [{
                    'type': 'LANDMARK_DETECTION',
                    'maxResults': 1,
                }]

            }]
        }
        response = service.execute(body=body)
        landmark = response['responses'][0]['landmarkAnnotations'][0]['description']
        print('Found text: {}'.format(landmark))

if __name__ == '__main__':
    parser = argparse.ArgumentParser()
    parser.add_argument('image_file', help='The image you\'d like to detect landmark.')
    args = parser.parse_args()
    main(args.image_file)
