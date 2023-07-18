/*! For license information please see app.js.LICENSE.txt */
  query getLocations(
    $locale: AvailableLocale! = NL
    $xMax: Float! = 50.86539880176159
    $xMin: Float! = 50.89383019358425
    $yMax: Float! = 4.726524353027345
    $yMin: Float! = 4.675369262695313
    $organisationTypeCode: [String]
    $productCategory: [String]
  ) {
    locations: locationsBbox(
      locale: $locale
      xMax: $xMax
      xMin: $xMin
      yMax: $yMax
      yMin: $yMin
      organisationTypeCode: $organisationTypeCode
      productCategory: $productCategory
    ) {
      address {
        countryCode
        formatted
      }
      landingPage
      contactsEmail
      contactsPhone
      contactsWebsite
      geometry {
        coordinates
        type
      }
      id
      locale
      name
      organisationTypeCode
      productCategory
    }
  }
`,$t=It`
  query getLocations($locale: AvailableLocale! = NL, $search: String) {
    locations: locations(locale: $locale, search: $search) {
      id
      name
      geometry {
        coordinates
        type
      }
    }
  }
`,Vt=It`
  query getOrganisationTypes {
    ordsStandard: standard {
      organisationTypes
      productCategories {
        id
        label
      }
    }
  }