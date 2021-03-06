# Created by: Greg Larkin <glarkin@FreeBSD.org>
# $FreeBSD$

PORTNAME=	hiera
PORTVERSION=	3.0.1
CATEGORIES=	sysutils rubygems
MASTER_SITES=	RG

MAINTAINER=	ruby@FreeBSD.org
COMMENT=	Pluggable data store for hierarchical data

LICENSE=	APACHE20

RUN_DEPENDS=	${PKGNAMEPREFIX}json_pure>=0:${PORTSDIR}/devel/rubygem-json_pure

CONFLICTS_INSTALL=	rubygem-hiera1-*

NO_ARCH=	yes

USE_RUBY=	yes
USE_RUBYGEMS=	yes
RUBYGEM_AUTOPLIST=	yes
HIERA_DBDIR=	/var/db/hiera
PLIST_FILES=	bin/hiera
PLIST_DIRS=	${HIERA_DBDIR}

post-install:
	@${REINPLACE_CMD} "s!/etc/puppetlabs/code/environments/%{environment}/hieradata!${HIERA_DBDIR}!" \
		${STAGEDIR}${PREFIX}/${GEM_LIB_DIR}/lib/hiera/util.rb \
		${STAGEDIR}${PREFIX}/${GEM_LIB_DIR}/spec/unit/util_spec.rb
	@${REINPLACE_CMD} "s!/etc/puppetlabs/code!${PREFIX}/etc!" \
		${STAGEDIR}${PREFIX}/${GEM_LIB_DIR}/lib/hiera/util.rb \
		${STAGEDIR}${PREFIX}/${GEM_LIB_DIR}/spec/unit/util_spec.rb
	@${FIND} ${STAGEDIR}${PREFIX}/${GEM_LIB_DIR} -name \*.bak -delete
	@${MKDIR} ${STAGEDIR}${HIERA_DBDIR}

.include <bsd.port.mk>
